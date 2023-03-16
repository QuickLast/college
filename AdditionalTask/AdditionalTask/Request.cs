using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdditionalTask
{
    internal class Request
    {
        public string Destination { get; set; }
        public DateTime Time { get; set; }
        public DateTime Date { get; set; }

        public Request (string destination, DateTime time, DateTime date)
        {
            Destination = destination;
            Time = time;
            Date = date;
        }
    }
}
