//Task 1
/*double C(int k, int n)
{
    return Factorial(n) / (Factorial(k) * Factorial(n - k));
}
int Factorial(int n)
{
    if (n == 1) return 1;
    return n * Factorial(n - 1);
}
Console.WriteLine(C(7, 9));*/

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
/*string TurnUp(string s)
{
    return s.ToUpper(); 
}
string TurnLower(string s)
{
    return s.ToLower();
}
Console.WriteLine(TurnUp("lower"));
Console.WriteLine(TurnLower("upper"));*/

//Task 4
/*double Amount(double[] array)
{
    double sum = 0;
    int counter = 0;
    foreach(double i in array)
    {
        sum = sum + i;
    }
    double mean = sum / array.Length;
    Console.WriteLine($"Mean is {mean}");
    foreach(double i in array)
    {
        if (i > mean)
            counter++;
    }
    return counter;
}
Random rnd = new Random();
int n = rnd.Next(10);
double[] array = new double[n];
for(int i = 0; i < n; i++)
    array[i] = rnd.Next(10);
foreach (double item in array)
    Console.Write(item + " ");
Console.WriteLine();
Console.WriteLine($"Amount of items bigger than mean: {Amount(array)}");*/

//Task 5
Random rnd = new Random();
int n = rnd.Next(3, 5);
int[,] array = new int[n,n];
for(int i = 0; i < n; i++)
{
    for (int j = 0; j < n; j++)
    {
        array[i, j] = rnd.Next(10);
        Console.Write(array[i, j]);
    }
    Console.WriteLine();
}




