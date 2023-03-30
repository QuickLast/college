using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice21
{
    internal class Circle : GeometricalFigure
    {
        public double Radius { get; set; }
        public Circle(double radius)
        {
            TypeOfFigure = "Circle";
            Radius = radius;
        }
        public override double squareOfFigure()
        {
            return Radius * Radius * Math.PI;
        }
        public override string ToString()
        {
            return $"Radius of the {TypeOfFigure} = {Radius}, Square of the circle = {squareOfFigure()}\n";
        }
    }
}
