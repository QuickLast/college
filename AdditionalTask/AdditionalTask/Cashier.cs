using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdditionalTask
{
    internal class Cashier
    {
        private static int last_id = 0;
        private int id;
        public int Id { get { return id; } }

        private int inc_id()
        {
            return ++Cashier.last_id;
        }
        public string Name { get; set; }
        public string Surname { get; set; }
        public string Departure { get; set; }
        public int Cost { get; set; }
        public string Stantions { get; set; }
        public int TrainId { get; set; }
        

        public Cashier (string name, string surname, string departure, int cost, string stantions, int trainId)
        {
            Name = name;
            Surname = surname;
            Departure = departure;
            Cost = cost;
            Stantions = stantions;
            TrainId = trainId;
            id = inc_id();
        }

        public string CashierSearch(int trainId, Cashier cashier)
        {
            if (trainId == cashier.TrainId)
                return $"Билет на поезд номер {trainId} можно купить у кассира в кассе под номером {cashier.id}.\nВаш кассир - {cashier.Name} {cashier.Surname}.\nЦена билета - {cashier.Cost} рублей";
            else
                return "";
        }
    }
}
