using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AdditionalTask
{
    internal class Bill
    {
        private static int last_id = 1;
        public int Id { get; }
        public int Summary { get; set; }

        public Bill(int summary)
        {
            Summary = summary;
            Id = inc_id();
        }

        private int inc_id()
        {
            return ++Bill.last_id;
        }

    
}
}
