using System;
using System.Collections.Generic;
using System.Diagnostics.Tracing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdditionalTask
{
    internal class Train
    {
        private static int last_id = 0;
        private int id;
        public int Id { get { return id; } }

        private int inc_id()
        {
            return ++Train.last_id;
        }
        public string TrainDestination { get; set; }
        public DateTime DepatureTime { get; set; }
        public DateTime DepatureDate { get; set; }

        

        public Train(string destination, DateTime time, DateTime date)
        {
            TrainDestination = destination;
            DepatureTime = time;
            DepatureDate = date;
            id = inc_id();
        }
        

        public string TrainSearch(string dest, Train tr)
        {
            if (dest == tr.TrainDestination)
                return $"Поезд номер {tr.Id} по направлению \"{tr.TrainDestination}\" отправляется по вашей заявке";
            else
                return "";
        }
    }
}
