#include <iostream>
#include <iomanip>
using namespace std;

struct Mhs{
    string nama;
    float ipk;
};
struct node{
	Mhs mhs;
	node *next;
};
node *head, *tail, *cur, *newNode, *del, *before;

void createList(string nama, float ipk);
void addData(string nama, float ipk);
void printList();
void binarySearch(float target_ipk);

int main (){
    int choice;
    float target;
    createList("luffy", 2.50);
    addData("nami", 3.75);
    addData("usop", 3.56);
    addData("sanji", 3.38);
    addData("chopa", 3.54);
    addData("zoro", 2.74);
    addData("brook", 3.01);
    addData("robin", 3.92);
    addData("franky", 3.17);
    addData("jinbei", 3.29);

    while (true){
    cout << "pilih menu :\n";
    cout << "1. Tampilkan data.\n2. Cari IPK.\n";
    cout << "3. Keluar program.\n";
    cout << "masukkan pilihan : ";
    cin >> choice;

    switch(choice){
        case 1: cout << "Data Mahasiswa\n";
                printList();
                break;
        case 2: system("cls");
                cout << "masukkan jumlah ipk yang ingin dicari ";
                cin >> target;
                binarySearch(target);
                break;
        case 3: cout << "\t\t\tTERIMA KASIH\n";
                cout << "PROGRAM INI DIBUAT OLEH :";
                cout << "(220040248) MADE PRABA JAYA KUSUMA";
                exit(0);
        }
    }
    return 0;
    cin.get();
}
void createList(string nama, float ipk){
    head = new node();
    head->mhs.nama = nama;
    head->mhs.ipk = ipk;
    head->next = NULL;
    tail = head;
}
void addData(string nama, float ipk){
    newNode = new node();
    newNode->mhs.nama = nama;
    newNode->mhs.ipk = ipk;
    newNode->next = NULL;
    tail->next = newNode;

    tail = newNode;
}
void printList(){
    cur = head;
    while(cur != nullptr){
        cout << cur->mhs.nama << ", IPK = " << cur->mhs.ipk << "\n";
        cur = cur->next;
    }
    cout << endl;
}

void bubbleSort() {
    bool swapped = true;
    while (swapped) {
        swapped = false;
        cur = head;

        while (cur->next != nullptr) {
            if (cur->mhs.ipk > cur->next->mhs.ipk) {
                swap(cur->mhs, cur->next->mhs);
                swapped = true;
            }
            cur = cur->next;
        }
    }
}

void binarySearch(float target_ipk){
    bubbleSort();
    node *low = head;
    node *high = tail;
    bool found = false;

    while (low <= high) {
        node *mid = low + (high - low) / 2;

        if (mid->mhs.ipk == target_ipk) {
            cout << "Mahasiswa dengan IPK " << mid->mhs.ipk << ":\n";
            cout << mid->mhs.nama << endl;
            found = true;
            break;
        } else if (mid->mhs.ipk < target_ipk) {
            low = mid + 1;
        } else {
            high = mid - 1;
        }
    }

    if (!found) {
        cout << "Mahasiswa dengan IPK " << target_ipk << " tidak ditemukan." << endl;
    }
}

