
using AdditionalTask;
using System.Diagnostics.Contracts;

void errorCheck(int errHandl, Exception err)
{
    if (errHandl != 0)
        throw err;
}

int errorHandler = 0;
Exception error = new Exception("Что-то пошло не так. Попробуйте снова.");

List<Train> trains = new List<Train>(3);
trains.Add(new Train("Moscow - Kazan", new DateTime(2022, 4, 5), new DateTime(2022, 4, 5, 13, 00, 00)));
trains.Add(new Train("Kazan - Moscow", new DateTime(2022, 4, 5), new DateTime(2022, 4, 5, 13, 00, 00)));
trains.Add(new Train("Moscow - Saint-Petersburg", new DateTime(2023, 2, 2), new DateTime(2023, 2, 2, 11, 00, 00)));

List<Cashier> cashiers = new List<Cashier>(2);
cashiers.Add(new Cashier("Natalia", "Petrova", "Moscow - Kazan", 5000, "Moscow - Ryazan - Kazan", 1));
cashiers.Add(new Cashier("Natalia", "Petrova", "Kazan - Moscow", 4500, "Kazan - Ryazan - Moscow", 2));
cashiers.Add(new Cashier("Olga", "Olegova", "Moscow - Saint-Petersburg", 7500, "Moscow - Smolensk - Saint-Petersburg", 3));

List<Request> requests = new List<Request>(2);
requests.Add(new Request("Moscow - Kazan", new DateTime(2022, 4, 5), new DateTime(2022, 4, 5, 13, 00, 00)));
requests.Add(new Request("Kazan - Moscow", new DateTime(2023, 2, 2), new DateTime(2023, 2, 2, 11, 00, 00)));

Console.WriteLine("Регистрация в системе. Введите ваше имя, фамилию: возраст и паспортные данные.");
Console.WriteLine("Мы стараемся быть интернациональными, поэтому язык ввода - английский\n");

Console.Write("Имя: ");
string passengerName = Console.ReadLine();
Console.Write("Фамилия: ");
string passengerSurname = Console.ReadLine();
Console.Write("Возраст: ");
int passengerAge = int.Parse(Console.ReadLine());
Console.Write("Номер паспорта: ");
string passengerPassId = Console.ReadLine();

Passenger passenger = new Passenger(passengerName, passengerSurname, passengerAge, passengerPassId);

Console.WriteLine("\nДобро пожаловать на Казанский Вокзал!\nПожалуйста, следуйте инструкциям и мы найдем для вас нужный поезд!");
Console.Write("\nПожалуйста, введите пункт отправления: ");
string depatureFromUser = Console.ReadLine().Trim();
Console.Write("Пожалуйста, введите пункт назначения: ");
string arrivalFromUser = Console.ReadLine().Trim();
string requestFromUser = $"{depatureFromUser} - {arrivalFromUser}";

for (int i = 0; i < trains.Count; i++)
{
    string trainAnswer = trains[i].TrainSearch(requestFromUser, trains[i]);
    if (trainAnswer != "")
    {
        Console.WriteLine(trainAnswer);
        break;
    }
    else if (trains.Count-1 == i)
    {
        Console.WriteLine("Ничего не найдено.");
        errorHandler++;
    }
}

errorCheck(errorHandler, error);

Console.Write("\nПожалуйста, выберите необходимый вам поезд: ");
int trainFromUser = int.Parse(Console.ReadLine());

int cashierId = -1;

for(int i = 0; i < cashiers.Count; i++)
{
    string cashierAnswer = cashiers[i].CashierSearch(trainFromUser, cashiers[i]);
    if (cashierAnswer != "")
    {
        Console.WriteLine(cashierAnswer);
        cashierId = cashiers[i].Id;
        break;
    }
    else if (cashiers.Count - 1 == i)
    {
        Console.WriteLine("Ничего не найдено.");
        errorHandler++;
    }
}

errorCheck(errorHandler, error);

Console.WriteLine("\nСейчас вы перейдете к кассе.");

Bill bill = new Bill(cashiers[cashierId].Cost);

Console.WriteLine($"\n- Здравствуйте! Ваш билет стоит {cashiers[cashierId].Cost}. Номер билета: {bill.Id}");
Console.WriteLine("\nВы согласны перейти к оплате билета? (Yes/No)");
string billAnswer = Console.ReadLine();
if (billAnswer == "No")
    throw error;

Console.WriteLine($"\nОтлично! Проверьте пожалуйста ваши данные: {passenger.Name} {passenger.Surname}, \nбилет номер {bill.Id}, отправление из {depatureFromUser}, прибытие в {arrivalFromUser}, дата: {trains[trainFromUser].DepatureTime}\n\nВсе верно? (Yes/No)");

billAnswer = Console.ReadLine();
if (billAnswer == "No")
    throw error;

Console.WriteLine("\nИдет оплата с вашего банковского счета... Готово!");

