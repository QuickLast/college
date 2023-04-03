using Practice22;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Reflection;
using System.Text;
using System.Threading.Tasks;

ComplexClass complex1 = new ComplexClass { Imaginary = "2i", Real = "2" };
ComplexClass complex2 = new ComplexClass { Imaginary = "-3i", Real = "-3" };

Console.WriteLine($"Даны 2 комплексных числа: {complex1}; {complex2}");

/* Сумма */
ComplexClass sum = complex1 + complex2;
Console.WriteLine("Сумма = " + sum);

/* Вычитание */
ComplexClass difference = complex1 - complex2;
Console.WriteLine("Разность = " + difference);

/* Умножение */
ComplexClass multiplication = complex1 * complex2;
Console.WriteLine("Умножение = " + multiplication);

/* Деление */
ComplexClass division = complex1 / complex2;
Console.WriteLine("Деление = " + division);