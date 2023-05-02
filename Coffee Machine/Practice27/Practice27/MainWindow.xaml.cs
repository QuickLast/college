using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using Practice27.Components;

namespace Practice27
{
    /// <summary>
    /// Логика взаимодействия для MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();

            List<CoffeeButton> buttons = new List<CoffeeButton>()
            {
                new CoffeeButton("Американо","/Images/americano.png", 50),
                new CoffeeButton("Черный","/Images/black.png", 40),
                new CoffeeButton("Капучино","/Images/capuchino.png", 75),
                new CoffeeButton("Доппио","/Images/doppio.png", 60),
                new CoffeeButton("Латте","/Images/latte.png", 80),
                new CoffeeButton("Макиато","/Images/makiato.png", 100)
            };

            CoffeeLV.ItemsSource = buttons;

            ErrorTbk.Text = "Выберите кофе";
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            var coffee = (sender as Button).DataContext as CoffeeButton;
            if (int.Parse(PutTBk.Text) > 0)
                MessageBox.Show($"Вам вернули ваши {PutTBk.Text} рублей");
            BackTBk.Text = "0";
            PutTBk.Text = "0";
            SugarCountTBk.Text = "0";
            BigImg.Source = new BitmapImage( new Uri(coffee.CoffeeContent, UriKind.Relative) );
            OutSumTBk.Text = coffee.CoffeeCost.ToString(); BackTBk.Text = (int.Parse(PutTBk.Text) - int.Parse(OutSumTBk.Text)).ToString();
            if (PutTBk.Text == "0")
            {
                BackTBk.Text = "0";
                ErrorTbk.Text = $"Вам необходимо внести еще {(int.Parse(OutSumTBk.Text) - int.Parse(PutTBk.Text)).ToString()} рублей";
            }
            if (int.Parse(BackTBk.Text) <= 0)
            {
                BackTBk.Text = "0";
                ErrorTbk.Text = $"Вам необходимо внести еще {(int.Parse(OutSumTBk.Text) - int.Parse(PutTBk.Text)).ToString()} рублей";
            }
                
        }

        private void InputBtn_Click(object sender, RoutedEventArgs e)
        {
            var inputBtn = sender as Button;
            PutTBk.Text = (int.Parse(PutTBk.Text) + int.Parse((string)inputBtn.Content)).ToString();
            if ((int.Parse(PutTBk.Text) - int.Parse(OutSumTBk.Text)) < 0)
            {
                ErrorTbk.Text = $"Вам необходимо внести еще {(int.Parse(OutSumTBk.Text) - int.Parse(PutTBk.Text)).ToString()} рублей";
            }
            else
            {
                BackTBk.Text = (int.Parse(PutTBk.Text) - int.Parse(OutSumTBk.Text)).ToString();
                ErrorTbk.Text = "";
            }
        }

        private void PlusBtn_Click(object sender, RoutedEventArgs e)
        {
            SugarCountTBk.Text = (int.Parse(SugarCountTBk.Text) + 1).ToString();
            OutSumTBk.Text = (int.Parse(OutSumTBk.Text) + 5).ToString();
            BackTBk.Text = (int.Parse(PutTBk.Text) - int.Parse(OutSumTBk.Text)).ToString();
            if (PutTBk.Text == "0")
            {
                BackTBk.Text = "0";
            }
            if (int.Parse(BackTBk.Text) < 0)
            {
                BackTBk.Text = "0";
                ErrorTbk.Text = $"Вам необходимо внести еще {(int.Parse(OutSumTBk.Text) - int.Parse(PutTBk.Text)).ToString()} рублей";
            }
        }

        private void MinusBtn_Click(object sender, RoutedEventArgs e)
        {
            try
            {
                if(int.Parse(SugarCountTBk.Text) != 0)
                {
                    SugarCountTBk.Text = (int.Parse(SugarCountTBk.Text) - 1).ToString();
                }
                else
                {
                    throw new Exception();
                }
                OutSumTBk.Text = (int.Parse(OutSumTBk.Text) - 5).ToString();
                BackTBk.Text = (int.Parse(PutTBk.Text) - int.Parse(OutSumTBk.Text)).ToString();
                if (PutTBk.Text == "0")
                {
                    BackTBk.Text = "0";
                }
                if (int.Parse(BackTBk.Text) < 0)
                {
                    BackTBk.Text = "0";
                    ErrorTbk.Text = $"Вам необходимо внести еще {(int.Parse(OutSumTBk.Text) - int.Parse(PutTBk.Text)).ToString()} рублей";
                }
            }
            catch
            {
                MessageBox.Show("Количество не может быть отрицательным!");
            }
            
        }
        private void Button_Click_1(object sender, RoutedEventArgs e)
        {
            if (ErrorTbk.Text == "")
            {
                MessageBox.Show($"Ваш кофе готов! Приходите еще!\nВаша сдача: {BackTBk.Text} рублей");
                BackTBk.Text = "0";
                PutTBk.Text = "0";
                SugarCountTBk.Text = "0";
            }
            else
            {
                MessageBox.Show("Что-то пошло не так. Операция не успешна.");
            }
        }
    }
}


