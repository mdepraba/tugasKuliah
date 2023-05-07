#include <iostream>
#include <iomanip>
using namespace std;


void printNum(int x), addAmount(int x, int& Odd, int& Even);


int main(int argc, char const *argv[]){
    
    int in;
    cout << "masukkan angka terbesar: ";
    cin >> in;

    int y = in;

    int amountOdd = 0;
    int amountEven = 0;
    int totalSum = 0;

    for (int i = 1; i <= y; i++){


        cout << "Deret " << i << ":";
        for (int j = 0; j < i; j++){
			cout << "   ";
        }
        for (int num = in*in; num >= in; num -= in){
            printNum(num);
            addAmount(num, amountOdd, amountEven);
            totalSum += num;

            if (num == in){
                for (int num2 = 2*num; num2 <= in*in; num2 += in){
                    printNum(num2);
                    addAmount(num2, amountOdd, amountEven);
                    totalSum += num2;
                }
            }
        }
        in--;
        for (int tab = 0; tab <= i; tab++){
            cout << "   ";
        }
        cout << "ganjil = " << amountOdd << "| genap = " << amountEven;
        cout << endl;
    }

    cout << "\nbanyak bilangan = " << amountEven + amountOdd;
    cout << "\nbanyak bilangan ganjil = " << amountOdd;
    cout << "\nbanyak bilangan genap  = " << amountEven;
    cout << "\njumlah bilangan = " << totalSum;


    return 0;
}

// print Numbers 2 digit
void printNum(int x){
    cout << setfill('0') << setw(2) << x << " ";
}

void addAmount(int x, int& Odd, int& Even) {
    if (x % 2 == 0) {
        Even += 1;
    } else {
        Odd += 1;
    }
}

