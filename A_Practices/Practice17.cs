//Task1
/*int FromAToB(int a, int b)
{
    if (a < b)
    {
        Console.WriteLine(a);
        return FromAToB(a + 1, b);
    }
    else if (a > b)
    {
        Console.WriteLine(a);
        return FromAToB(a - 1, b);
    }
    else
    {
        Console.WriteLine(b);
        return b;
    }
}

Console.WriteLine("Введите значение a и b построчно:");
int a = Convert.ToInt32(Console.ReadLine());
int b = Convert.ToInt32(Console.ReadLine());
Console.WriteLine();
FromAToB(a, b);*/

//Task2
/*int Akkermann(int m, int n)
{
    if (m == 0)
    {
        return n + 1;
    }
    else if (m > 0 && n == 0)
    {
        return Akkermann(m - 1, 1);
    }
    else
    {
        return Akkermann(m - 1, Akkermann(m, n - 1));
    }
}*/

/*Console.WriteLine("Введите два неотрицательных числа m и n построчно");
int m = Convert.ToInt32(Console.ReadLine());
int n = Convert.ToInt32(Console.ReadLine());
Console.WriteLine(Akkermann(m, n));*/

//Task3
/*int SumOfNum(int n)
{
    if (n > 0)
        return n % 10 + SumOfNum(n / 10);
    else
        return 0;
}

Console.WriteLine("Введите натуральное число:");
int n = Convert.ToInt32(Console.ReadLine());
Console.WriteLine(SumOfNum(n));*/

//Task4
/*string AllNumReversed(int n)
{
    if (n > 0)
    {
        return Convert.ToString(n % 10) + "\n" + AllNumReversed(n / 10);
    }
    else
        return "";
}
Console.WriteLine("Введите натуральное число:");
int n = Convert.ToInt32(Console.ReadLine());
Console.WriteLine(AllNumReversed(n));*/

//Task5
/*string Palindrome(string s)
{
    if (s[0] == s[^1])
    {
        s = s.Substring(1, s.Length - 1);
        Palindrome(s);
    }
    else
        return "NO";
    return "YES";
}
Console.WriteLine("Введите слово используя латиницу:");
string s = Console.ReadLine();
Console.WriteLine(Palindrome(s));*/

