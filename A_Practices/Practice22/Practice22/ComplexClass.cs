using System;
using System.Collections.Generic;
using System.Linq;
using System.Reflection;
using System.Text;
using System.Threading.Tasks;

namespace Practice22
{
    internal class ComplexClass
    {
        public string Imaginary { get; set; }
        public string Real { get; set; }
        public static ComplexClass operator +(ComplexClass complex1, ComplexClass complex2)
        {
            int imaginaryFirst = Convert.ToInt32(complex1.Imaginary.Substring(0, complex1.Imaginary.Length - 1));
            int imaginarySecond = Convert.ToInt32(complex2.Imaginary.Substring(0, complex2.Imaginary.Length - 1));

            int realFirst = Convert.ToInt32(complex1.Real);
            int realSecond = Convert.ToInt32(complex2.Real);

            ComplexClass sum = new ComplexClass { Imaginary = Convert.ToString(imaginaryFirst + imaginarySecond) + "i", Real = Convert.ToString(realFirst + realSecond) };

            if (sum.Imaginary == "1i") sum.Imaginary = "i";
            else if (sum.Imaginary == "-1i") sum.Imaginary = "-i";

            return sum;
        }
        public static ComplexClass operator -(ComplexClass complex1, ComplexClass complex2)
        {
            int imaginaryFirst = Convert.ToInt32(complex1.Imaginary.Substring(0, complex1.Imaginary.Length - 1));
            int imaginarySecond = Convert.ToInt32(complex2.Imaginary.Substring(0, complex2.Imaginary.Length - 1));

            int realFirst = Convert.ToInt32(complex1.Real);
            int realSecond = Convert.ToInt32(complex2.Real);


            ComplexClass difference = new ComplexClass { Imaginary = Convert.ToString(imaginaryFirst - imaginarySecond) + "i", Real = Convert.ToString(realFirst - realSecond) };

            if (difference.Imaginary == "1i") difference.Imaginary = "i";
            else if (difference.Imaginary == "-1i") difference.Imaginary = "-i";

            return difference;
        }
        public static ComplexClass operator *(ComplexClass complex1, ComplexClass complex2)
        {
            int imaginaryFirst = Convert.ToInt32(complex1.Imaginary.Substring(0, complex1.Imaginary.Length - 1));
            int imaginarySecond = Convert.ToInt32(complex2.Imaginary.Substring(0, complex2.Imaginary.Length - 1));

            int realFirst = Convert.ToInt32(complex1.Real);
            int realSecond = Convert.ToInt32(complex2.Real);


            ComplexClass multiplex = new ComplexClass { Imaginary = Convert.ToString(imaginaryFirst*realSecond+realFirst*imaginarySecond) + "i", Real = Convert.ToString(realFirst*realSecond-imaginaryFirst*imaginarySecond) };

            if (multiplex.Imaginary == "1i") multiplex.Imaginary = "i";
            else if (multiplex.Imaginary == "-1i") multiplex.Imaginary = "-i";

            return multiplex;
        }

        public static ComplexClass operator /(ComplexClass complex1, ComplexClass complex2)
        {
            double imaginaryFirst = Convert.ToDouble(complex1.Imaginary.Substring(0, complex1.Imaginary.Length - 1));
            double imaginarySecond = Convert.ToDouble(complex2.Imaginary.Substring(0, complex2.Imaginary.Length - 1));

            double realFirst = Convert.ToDouble(complex1.Real);
            double realSecond = Convert.ToDouble(complex2.Real);


            ComplexClass division = new ComplexClass { Imaginary = Convert.ToString((imaginaryFirst*realSecond-realFirst*imaginarySecond)/(realSecond*realSecond + imaginarySecond*imaginarySecond)) + "i", Real = Convert.ToString((realFirst*realSecond+imaginaryFirst*imaginarySecond)/(realSecond * realSecond + imaginaryFirst * imaginaryFirst)) };

            if (division.Imaginary == "1i") division.Imaginary = "i";
            else if (division.Imaginary == "-1i") division.Imaginary = "-i";

            return division;
        }
        public override string ToString()
        {
            return $"{Real} + {Imaginary}";
        }
    }
}
