#include "Story.h"
#include <conio.h>
using namespace std;

Story::Story() 
{
	makemap();
}

void Story::makemap() 
{
	for (int i = 0; i < 21; i++)
		cout << "��";
	cout << endl;

	cout << "��                                      ��" << endl;

	for (int i = 1; i < 5; i++)
		cout << endl;

	cout << "      �W�j�s���q���j�A" << endl << "       �b�a�y�S�Ѧh��³�����~�N�A" << endl;

	for (int i = 0; i < 3; i++)
		cout << endl;

	cout << "       �H�̪��@������" << endl << "        ���C�C�a�Q�W�j�s�]�����b..." << endl;

	for (int i = 0; i < 5; i++)
		cout << endl;

	cout << "��                             Enter>>>>��" << endl;

	for (int i = 0; i < 21; i++)
		cout << "��";
	cout << endl;

	_getch();
	system("Cls");

	for (int i = 0; i < 21; i++)
		cout << "��";
	cout << endl;

	cout << "��                                      ��" << endl;

	for (int i = 1; i < 5; i++)
		cout << endl;

	cout << "      �]���S�F��Y�A" << endl << "       �W�j�s�P����~���}�l���F�����A" << endl;

	for (int i = 0; i < 3; i++)
		cout << endl;

	cout << "       ���������V�t�V�P" << endl << "        �̫�l�������۴ݱ�..." << endl;

	for (int i = 0; i < 5; i++)
		cout << endl;

	cout << "��                             Enter>>>>��" << endl;

	for (int i = 0; i < 21; i++)
		cout << "��";
	cout << endl;

	_getch();
	system("Cls");
}