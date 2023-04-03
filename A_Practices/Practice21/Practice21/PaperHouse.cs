using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice21
{
    internal abstract class PaperHouse
    {
        public string Name { get; set; }
        public string Description { get; set; }
        public string Author { get; set; }
        public int NumberOfPages { get; set; }
        public PaperHouse(string name, string description, string author, int numberOfPages)
        {
            Name = name;
            Description = description;
            Author = author;
            NumberOfPages = numberOfPages;
        }

        public abstract void PrintInfo();
    }
}
