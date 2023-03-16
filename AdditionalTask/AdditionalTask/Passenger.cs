using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdditionalTask
{
    internal class Passenger
    {
        public string Name { get; set; }
        public string Surname { get; set; }
        public int Age { get; set; }
        public string PassportID { get; set; }
       

        public Passenger(string name, string surname, int age, string passportID)
        {
            Name = name;
            Surname = surname;
            Age = age;
            PassportID = passportID;
        }
    }
}
