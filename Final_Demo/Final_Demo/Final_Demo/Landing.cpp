#include "Landing.h"
#include <iostream>
using namespace std;

Landing::Landing()
{
	makemap();
}

void Landing::control()
{

}

void Landing::makemap() 
{
	for (int i = 0; i < 27; i++)
	{
		for (int j = 0; j < 21; j++)
		{
			if (mapLanding[i][j] == 1)
				cout << "��";
			else if (mapLanding[i][j] == 0)
				cout << "  ";
			else if (mapLanding[i][j] == 4)
				cout << "�X";
			else if (mapLanding[i][j] == 3)
				cout << "��";
			else if (mapLanding[i][j] == 5)
				cout << "��";
			else if (mapLanding[i][j] == 6)
				cout << "��";
			else if (mapLanding[i][j] == 7)
				cout << "��";
			else if (mapLanding[i][j] == 8)
				cout << "��";
			else if (mapLanding[i][j] == 9)
				cout << "��";
		}
		cout << endl;
	}
	_getch();
	system("cls");
}