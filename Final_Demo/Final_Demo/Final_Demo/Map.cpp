#include "Map.h"

Map::Map() 
{

};

int Map::flag = 0;
int Map::flag1 = 0;
int Map::flag2 = 0;

void Map::cls()
{
	COORD coor = { 0,0 };
	for (int i = 0; i < 1; i++) 
	{
		coor.X = i;
		coor.Y = 0;
		SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), coor);
	}
}

void Map::talk(int code)
{
	if (code == 1)
	{
		if (flag == 0) {
			cout << endl << endl << "	���j�i�̰ڡA�Хh�Q��W�j�s!" << endl << endl << "	j ����	k �ϥιD��" << endl << "				Enter>>>>";
			flag = 1;
		}
		else if (flag == 1) {
			cout << endl << endl << "	���I�h�a!�����������ֳQ�Y���F!" << endl << endl << "	j ����	k �ϥιD��" << endl << "				Enter>>>>";
		}
		_getch();
		system("cls");
	}
	else if (code == 2)
	{
		if (flag == 0) {
			cout << endl << endl << "	�e����~�M�I�A�Хh�����!" << endl << endl << endl << "				Enter>>>>";
		}
		else if (flag == 1) {
			cout << endl << endl << "	���j���i�̰ڡA�������Ʊ�N�a�A�F!" << endl << endl << endl << "				Enter>>>>";
			flag1 = 1;
		}
		_getch();
		system("cls");
	}
}