#include <iostream>
#include <fstream>
#include <string>
#include <sstream>
#include <vector>
#include <algorithm>
#include <cctype>

using namespace std;

// Función para eliminar espacios iniciales y finales
string trim(const string &str)
{
    size_t first = str.find_first_not_of(" ");
    size_t last = str.find_last_not_of(" ");
    return (first == string::npos || last == string::npos) ? "" : str.substr(first, (last - first + 1));
}

// Función para dividir cadenas por un delimitador
vector<string> split(const string &str, char delimiter)
{
    vector<string> tokens;
    stringstream ss(str);
    string token;

    while (getline(ss, token, delimiter))
    {
        tokens.push_back(trim(token));
    }

    return tokens;
}

// Función para verificar si un nombre de campo es válido
bool isValidFieldName(const string &fieldName)
{
    if (fieldName.empty() || !isalpha(fieldName[0]))
    {
        return false;
    }
    for (char c : fieldName)
    {
        if (!isalnum(c) && c != '_')
        {
            return false;
        }
    }
    return true;
}

void generatePropiedadesProducto(const string &inputFileName, const string &outputFileName)
{
    ifstream inputFile(inputFileName);
    ofstream outputFile(outputFileName);

    if (!inputFile.is_open())
    {
        cerr << "Error al abrir el archivo de entrada: " << inputFileName << endl;
        return;
    }

    if (!outputFile.is_open())
    {
        cerr << "Error al abrir el archivo de salida: " << outputFileName << endl;
        return;
    }

    // Escribir cabecera del archivo PHP
    outputFile << "<?php" << endl;
    outputFile << "require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';" << endl;
    outputFile << endl;
    outputFile << "class PropiedadesProductos" << endl;
    outputFile << "{" << endl;
    outputFile << "    private $conexion;" << endl;
    outputFile << endl;
    outputFile << "    public function __construct()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $this->conexion = Conexion::obtenerConexion();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    vector<string> campos;
    string line;

    // Leer el archivo línea por línea y extraer nombres de campos
    while (getline(inputFile, line))
    {
        line = trim(line);
        if (!line.empty() && line.find("--") == string::npos) // Ignorar líneas vacías o comentarios
        {
            vector<string> parts = split(line, ' ');
            if (!parts.empty() && isValidFieldName(parts[0]) && parts[0] != "CREATE" && parts[0] != "CONSTRAINT")
            {
                campos.push_back(parts[0]); // Guardar el nombre del campo
            }
        }
    }

    // Generar método obtener
    outputFile << "    public function obtenerPropiedadesProductos()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = $this->conexion->query('SELECT" << endl;
    for (size_t i = 0; i < campos.size(); ++i)
    {
        outputFile << "            " << campos[i];
        if (i < campos.size() - 1)
            outputFile << "," << endl;
    }
    outputFile << "        FROM PROPIEDADESPRODUCTOS');" << endl;
    outputFile << "        return $query->fetchAll(PDO::FETCH_ASSOC);" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    // Generar método INSERT
    outputFile << "    public function insertarPropiedadesProductos(" << endl;
    for (size_t i = 1; i < campos.size(); ++i) // Empezar en 1 para omitir el primer campo (clave primaria)
    {
        outputFile << "        $" << campos[i];
        if (i < campos.size() - 1)
            outputFile << "," << endl;
    }
    outputFile << "    )" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = 'INSERT INTO PROPIEDADESPRODUCTOS (" << endl;
    for (size_t i = 1; i < campos.size(); ++i)
    {
        outputFile << "            " << campos[i];
        if (i < campos.size() - 1)
            outputFile << "," << endl;
    }
    outputFile << "        ) VALUES (" << endl;
    for (size_t i = 1; i < campos.size(); ++i)
    {
        outputFile << "            :" << campos[i];
        if (i < campos.size() - 1)
            outputFile << "," << endl;
    }
    outputFile << "        )';" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
    for (size_t i = 1; i < campos.size(); ++i)
    {
        outputFile << "        $stmt->bindParam(':" << campos[i] << "', $" << campos[i] << ");" << endl;
    }
    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    // Generar método UPDATE
    outputFile << "    public function editarPropiedadesProductos(" << endl;
    for (size_t i = 0; i < campos.size(); ++i)
    {
        outputFile << "        $" << campos[i];
        if (i < campos.size() - 1)
            outputFile << "," << endl;
    }
    outputFile << "    )" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = \"UPDATE PROPIEDADESPRODUCTOS SET" << endl;
    for (size_t i = 1; i < campos.size(); ++i)
    {
        outputFile << "            " << campos[i] << " = :" << campos[i];
        if (i < campos.size() - 1)
            outputFile << "," << endl;
    }
    outputFile << "        WHERE NOREG = :NOREG\";" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
    for (const auto &campo : campos)
    {
        outputFile << "        $stmt->bindParam(':" << campo << "', $" << campo << ");" << endl;
    }
    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    // Generar método DELETE
    outputFile << "    public function eliminarPropiedadesProductos($NOREG)" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = \"DELETE FROM PROPIEDADESPRODUCTOS WHERE NOREG = :NOREG\";" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
    outputFile << "        $stmt->bindParam(':NOREG', $NOREG, PDO::PARAM_INT);" << endl;
    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    outputFile << "}" << endl;

    inputFile.close();
    outputFile.close();
}

int main(int argc, char *argv[])
{
    if (argc != 3)
    {
        cerr << "Uso del comando: " << argv[0] << " <archivo_entrada> <archivo_salida>" << endl;
        return 1;
    }

    string inputFileName = argv[1];
    string outputFileName = argv[2];

    generatePropiedadesProducto(inputFileName, outputFileName);

    return 0;
}
