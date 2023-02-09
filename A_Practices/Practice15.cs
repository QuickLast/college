//Tasks of the Practice 14. Please change the code if you copy it,
//Otherwise I would need to remove the access to my code solutions.

//Задания для Практики 14. Пожалуйста меняйте код, если вы его копируете,
//Иначе мне придется закрыть доступ к моим решениям.


//Task 1
List<int> lst = new List<int>();
Random rnd = new Random();
for(int i = 0; i < 10; i++)
{
    lst.Add(rnd.Next(-10, 10));
}

Console.WriteLine("Список до изменений: ");
foreach (int item in lst)
    Console.Write(item + " ");

Console.WriteLine();

if (lst.IndexOf(5) == -1)
    Console.WriteLine("Числа 5 в списке нет.");
else
    Console.WriteLine("Индекс попавшегося числа 5: " + "[" + lst.IndexOf(5) + "]");

lst.Sort();
Console.WriteLine();
Console.WriteLine("Отсортированный список:");
foreach (int item in lst)
    Console.Write(item + " ");
    
//Task 2
List<string> lst = new List<string>() 
{ "Вадим", "Ильмир", "Карим", "Дима", "Семен", "Никита", "Леонид", "Егор" };

lst.Remove(lst[1]);
lst.Remove("Никита");

lst.RemoveAll(item => item.Length == 4);

lst.Add("Никита");
lst.Add("Александр");

lst.Remove(lst[1]);
lst.Remove(lst[2]);

for(int i = 0; i < lst.Count; i++)
{
    Console.WriteLine(lst[i]);
}

//Task 3
List<string> lst = new List<string>()
{ "Барано", "Симонов", "Аркадьева", "Маланина", "Беляев", "Петровский", "Михеева"};

Console.WriteLine("Есть ли работник с фамилией длиной 5 символов?");
if (lst.Any(x => x.Length == 5))
    Console.WriteLine("Да");
else
    Console.WriteLine("Нет");

Console.WriteLine(lst.FindLast(x => x.Length == 6));

Console.WriteLine();

//Task 4
List<int> lst = new List<int>() { 0, 1, 2, 2, 3, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 };
lst.GetRange(0, 3).ForEach(x => Console.Write(x + " "));

//Task 5
List<int> lst = new List<int>() { };
Random rnd = new Random();
for (int i = 0; i < 20; i++)
    lst.Add(rnd.Next(1, 10));

foreach (int n in lst)
    Console.Write(n + " ");

Console.WriteLine();
Console.WriteLine();

lst.Reverse();
lst.Reverse(2, 5);

foreach (int n in lst)
    Console.Write(n + " ");
