//Task 1
double C(int k, int n)
{
    return Factorial(n) / (Factorial(k) * Factorial(n - k));
}
int Factorial(int n)
{
    if (n == 1) return 1;
    return n * Factorial(n - 1);
}
Console.WriteLine(C(7, 9));

//Task 2
/*void C(int k, int n, out int result)
{
    result = Factorial(n) / (Factorial(k) * Factorial(n - k));
}
int Factorial(int n)
{
    if (n == 1) return 1;
    return n * Factorial(n - 1);
}
int number;
C(7, 9, out number);
Console.WriteLine(number);*/

//Task 3
/*string Switch(string s)
{
    string k = "";
    foreach (char c in s)
        if (Char.IsLower(c))
        {
            char outc = Char.ToUpper(c);
            k += outc;
        }
        else
        {
            char outc = Char.ToLower(c);
            k += outc;
        }      
    return k;
}
Console.Write("Напишите слово для преобразования: ");
string input = Console.ReadLine();
Console.WriteLine(Switch(input));*/

//Task 4
/*double Amount(double[] array)
{
    double sum = 0;
    int counter = 0;
    foreach (double i in array)
    {
        sum = sum + i;
    }
    double mean = sum / array.Length;
    Console.WriteLine($"Mean is {mean}");
    foreach (double i in array)
    {
        if (i > mean)
            counter++;
    }
    return counter;
}
Random rnd = new Random();
int n = rnd.Next(10);
double[] array = new double[n];
for (int i = 0; i < n; i++)
    array[i] = rnd.Next(10);
foreach (double item in array)
    Console.Write(item + " ");
Console.WriteLine();
Console.WriteLine($"Amount of items bigger than mean: {Amount(array)}");*/

//Task 5
/*Random rnd = new Random();
int Row = rnd.Next(3, 7);
int Column = Row;
int[,] mas = new int[Row, Column];
Console.WriteLine("Изначальный массив:");
for (int i = 0; i < Row; i++)
    for (int j = 0; j < Column; j++)
    {
        mas[i, j] = rnd.Next(20);
        Console.Write(mas[i, j].ToString() + "\t");
        if (j == mas.GetLength(1) - 1)
            Console.WriteLine();
    }

Console.WriteLine("\nОтсортированный массив:"); //чётные столбцы по убыванию, нечётные по возрастанию

int z;
for (int j = 0; j < Column; j++)
{
    if (j % 2 == 0)
    {
        for (int i1 = 0; i1 < Column - 1; i1++) //проверка по количеству итераций
        {
            for (int i2 = 0; i2 < Row - 1; i2++) //проверка по элементам
            {
                if (mas[i2 + 1, j] < mas[i2, j])
                {
                    z = mas[i2 + 1, j];
                    mas[i2 + 1, j] = mas[i2, j];
                    mas[i2, j] = z;
                }
            }
        }
    }


    else
    {
        for (int i1 = 0; i1 < Column - 1; i1++)
        {
            for (int i2 = 0; i2 < Row - 1; i2++)
            {
                if (mas[i2 + 1, j] > mas[i2, j])
                {
                    z = mas[i2 + 1, j];
                    mas[i2 + 1, j] = mas[i2, j];
                    mas[i2, j] = z;
                }
            }
        }
    }
}

for (int i2 = 0; i2 < Row; i2++)
    for (int j = 0; j < Column; j++)
    {
        Console.Write(mas[i2, j].ToString() + "\t");
        if (j == mas.GetLength(1) - 1)
            Console.Write("\n");
    }*/
