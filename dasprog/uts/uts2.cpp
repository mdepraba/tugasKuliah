#include <iostream>
using namespace std;

struct node{
    int data;
    node* next;
};
node *head, *tail, *cur, *newNode, *del;

void createAntri(int num), addAntrian(int num), printAntrian();
void deleteAntrian(), amountNode(int x);


int main(int argc, char const *argv[]){
    int choice, num;
    int amount = 0;

    while (true){
    cout << "pilih menu :\n";
    cout << "1. Tambah bilangan ke antrian.\n2. Mengeluarkan bilangan terdepan dari antrian.\n3. Menampilkan banyak bilangan sisa di antrian.\n4. Menampilkan semua bilangan di antrian.\n5. Keluar program antrian.\n";
    cout << "masukkan pilihan : ";
    cin >> choice;

    switch(choice){
        case 1: cout << "masukkan bilangan ke antrian (0 untuk berhenti): ";
                cin >> num;
                
                while(num != 0){
                    addAntrian(num);
                    cout << "masukkan bilangan ke antrian (0 untuk berhenti): ";
                    cin >> num;
                }
                system("cls");
                break;

        case 2: system("cls");
                cout << "isi antrian terdepan adalah : " << head->data;
                cout << "\nberhasil dikeluarkan dari antrian\n";
                deleteAntrian();
                break;

        case 3: system("cls");
                cout << "banyaknya bilangan dalam antrian: ";
                amountNode(amount);
                break;

        case 4: system("cls");
                cout << "semua bilangan dalam antrian :\n";
                printAntrian();
                break;
        case 5: cout << "\t\t\tTERIMA KASIH\nPROGRAM INI DIBUAT OLEH :";
                cout << "(220040248) MADE PRABA JAYA KUSUMA";
                exit(0);
    }
    }


    return 0;    
}

void createAntri(int num){
    head = new node();
    head->data = num;
    head->next = NULL;
    tail = head;
}

void addAntrian(int num){
    if (head == NULL) {
        createAntri(num);
        return;
    }

    newNode = new node();
    newNode->data = num;
    newNode->next = NULL;
    tail->next = newNode;

    tail = newNode;
}

void deleteAntrian(){
    del = head;
    head = head->next;
    delete del;
}

void printAntrian(){
    cur = head;
    while(cur != nullptr){
        cout << cur->data << " ";
        cur = cur->next;
    }
    cout << endl;
}

void amountNode(int x){
    cur = head;
    while(cur != nullptr){
        cur = cur->next;
        x++;
    }
    cout << x << endl;
}





