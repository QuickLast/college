using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice27.Components
{
    public class CoffeeButton
    {
        static int id = 0;
        public int CoffeeID { get; }
        public string CoffeeName { get; }
        public string CoffeeContent { get; set; }
        public int CoffeeCost { get; set; }
        public CoffeeButton(string coffeeName, string coffeeContent, int coffeeCost)
        {
            CoffeeID = id++;
            CoffeeName = coffeeName;
            CoffeeContent = coffeeContent;
            CoffeeCost = coffeeCost;
        }
    }
}
