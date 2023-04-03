using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice21
{
    internal class Square : Rectangle
    {
        public int Width { get; set; }
        public Square (int width) : base(width, width)
        {
            TypeOfFigure = "Square";
            Width = width;
        }
        public override double squareOfFigure()
        {
            return Width * Width;
        }
        public override string ToString()
        {
            return $"Length of the {TypeOfFigure} = {Width}, Square of the {TypeOfFigure} = {squareOfFigure()}\n";
        }
    }
}
