//Task1
/*Console.Write("Введите r: ");
int r = int.Parse(Console.ReadLine());
Console.Write("Введите h: ");
int h = int.Parse(Console.ReadLine());
Cone cone = new Cone(r, h);

Console.WriteLine($"Полная площадь конуса = {cone.SFull(cone.SOsn(r), cone.SBok(r, h))}");

class Cone
{
    private int r;
    private int H;
    public Cone(int radius, int Height)
    {
        r = radius;
        H = Height;
    }

    public double SOsn(int r)
    {
        return Math.PI * r * r;
    }
    public double SBok(int r, int H)
    {
        return Math.PI * r * Math.Sqrt(r * r + H * H);
    }
    public double SFull(double SOsn, double SBok)
    {
        return SOsn + SBok;
    }
}*/

//Task2

/*Car myCar = new Car("Tesla", "White", 25000, 225);

Console.WriteLine($"Текущие данные по машине {myCar.model}: цвет - {myCar.color}, \nцена - {myCar.price}, \nскорость - {myCar.speed}\n");

Console.WriteLine($"Объявляется скидка! Теперь машина стоит {myCar.PriceAfterSale(myCar.price)}");
Console.WriteLine($"Мы улучшили вашу машину! Теперь ее скорость = {myCar.SpeedAfterUpgrading(myCar.speed)}");
class Car
{
    public string model;
    public string color;
    public double price;

    public int speed;

    public Car(string m, string c, double p, int s)
    {
        this.model = m;
        this.color = c;
        this.price = p;

        this.speed = s;
    }

    public double PriceAfterSale(double p)
    {
        return p * 0.95;
    }

    public double SpeedAfterUpgrading(int s)
    {
        return s * 1.2;
    }
}*/
