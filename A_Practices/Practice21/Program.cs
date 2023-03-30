using Practice21;

Circle circle = new Circle(3.0);
Square square = new Square(5);
Rectangle rectangle = new Rectangle(10, 5);

Console.WriteLine(circle.ToString());
Console.WriteLine(square.ToString());
Console.WriteLine(rectangle.ToString());

Book book = new Book("Book 1", "Very nice book", "Me", 12, "Sci-Fi");
Magazine magazine = new Magazine("Magazine 1", "Really cool", "Not me", 5, "Sport");
StudentBook sbook = new StudentBook("Student Book 1", "Makes me study hard", "My teacher", 1231, "Maths");

book.PrintInfo();
magazine.PrintInfo();
sbook.PrintInfo();

