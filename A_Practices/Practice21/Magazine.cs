using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Practice21
{
    internal class Magazine : PaperHouse
    {
        public string Topic { get; set; }

        public Magazine(string name, string description, string author, int numberOfPages, string topic) : base(name, description, author, numberOfPages)
        {
            Topic = topic;
        }
        public override void PrintInfo()
        {
            Console.WriteLine($"{Name}, {Author}\n{Description},\nPages: {NumberOfPages}, Topic: {Topic}\n");
        }
    }
}
