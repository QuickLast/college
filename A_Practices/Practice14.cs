//Tasks of the Practice 14. Please change the code if you copy it,
//Otherwise I would need to remove the access to my code solutions.

//Задания для Практики 14. Пожалуйста меняйте код, если вы его копируете,
//Иначе мне придется закрыть доступ к моим решениям.

//Task 1
Queue<int> q = new Queue<int>();
Random rnd = new Random();
for (int i = 0; i < 21; i++)
{
    q.Enqueue(rnd.Next(1, 20));
}
int counter = 0;
Console.WriteLine("Числа, меньшие 10: ");
foreach (int item in q)
{
    if (item < 10)
    {
        Console.Write(item + ", ");
        counter++;
    }
}
Console.WriteLine();
Console.WriteLine();
Console.WriteLine("Количество элементов, меньших 10: ");
Console.WriteLine(counter);
Console.WriteLine();

Console.Write("Все элементы очереди: [ ");
foreach (int d in q)
{
    Console.Write(d + ", ");
}
Console.Write("]");

//Task 2
Queue<string> q = new Queue<string>();
q.Enqueue("Intel 2992 3040hz 3");
q.Enqueue("Intel 2991 3030hz 1");
q.Enqueue("Intel 2992 3020hz 3");

q.Enqueue("Intel 2995 3001hz 2");

Console.WriteLine("Все элементы очереди: ");
foreach (var item in q)
{
    Console.WriteLine(item);
}
Console.WriteLine("Процессоры, ядра которых больше 1: ");
foreach (string item in q)
{
    if (int.Parse(item.Split(" ")[3]) > 1)
    {
        Console.WriteLine(item);
    }
}

//Task 3
Stack<double> s = new Stack<double>();
s.Push(-5.2);
s.Push(72.3);
s.Push(2.3);
s.Push(18.4);
s.Push(-16.3);

Console.WriteLine(s.Max());

Console.WriteLine("Элементы стека: ");
foreach (double i in s)
{
    Console.Write(i + " ");
}

//Task 4
Stack<string> s = new Stack<string>();
s.Push("group");
s.Push("220");
s.Push("study");
s.Push("hello, group");
s.Push("are you ready");

Console.WriteLine("Все элементы стека: ");
foreach (string i in s)
{
    Console.Write(i + " ");
}

s.Pop();
s.Pop();

Console.WriteLine();
Console.WriteLine();
Console.WriteLine("Все элементы стека: ");
foreach (string i in s)
{
    Console.Write(i + " ");
}

Console.WriteLine();
Console.WriteLine();
Console.WriteLine("Минимальная строка: ");
Console.WriteLine(s.Min());

