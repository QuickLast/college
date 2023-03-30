using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml.Linq;

namespace Practice21
{
    internal class StudentBook : PaperHouse
    {
        public string Subject { get; set; }
        public StudentBook(string name, string description, string author, int numberOfPages, string subject) : base(name, description, author, numberOfPages)
        {
            Subject = subject;
        }
        public override void PrintInfo()
        {
            Console.WriteLine($"{Name}, {Author}\n{Description},\nPages: {NumberOfPages}, Subject: {Subject}\n");
        }
    }
}
