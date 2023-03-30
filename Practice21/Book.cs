using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice21
{
    internal class Book : PaperHouse 
    {
        public string Genre { get; set; }
        public Book(string name, string description, string author, int numberOfPages, string genre) : base(name, description, author, numberOfPages)
        {
            Genre = genre;
        }
        public override void PrintInfo()
        {
            Console.WriteLine($"{Name}, {Author}\n{Description},\nPages: {NumberOfPages}, Genre: {Genre}\n");
        }
    }
}
