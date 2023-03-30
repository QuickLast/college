using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice21
{
    internal class Rectangle : GeometricalFigure
    {
        public int Width { get; set; }
        public int Height { get; set; }

        public Rectangle(int width, int height)
        {
            TypeOfFigure = "Rectangle";
            Width = width;
            Height = height;
        }
        public override double squareOfFigure()
        {
            return Height * Width;
        }
        public override string ToString()
        {
            return $"Width of the {TypeOfFigure} = {Width},\nHeight of the {TypeOfFigure} = {Height}, \nSquare of the {TypeOfFigure} = {squareOfFigure()}\n";
        }
    }
}
