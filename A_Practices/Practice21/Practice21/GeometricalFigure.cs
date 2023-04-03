using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice21
{
    internal abstract class GeometricalFigure
    {
        public string TypeOfFigure { get; set; }
        public virtual double squareOfFigure()
        {
            return -1.0;
        }
       
    }
}
