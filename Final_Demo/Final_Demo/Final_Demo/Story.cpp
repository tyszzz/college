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
		cout << "■";
	cout << endl;

	cout << "■                                      ■" << endl;

	for (int i = 1; i < 5; i++)
		cout << endl;

	cout << "      上古龍食量極大，" << endl << "       在地球沒剩多少糧食的年代，" << endl;

	for (int i = 0; i < 3; i++)
		cout << endl;

	cout << "       人們的作物食物" << endl << "        都慢慢地被上古龍吞食乾淨..." << endl;

	for (int i = 0; i < 5; i++)
		cout << endl;

	cout << "■                             Enter>>>>■" << endl;

	for (int i = 0; i < 21; i++)
		cout << "■";
	cout << endl;

	_getch();
	system("Cls");

	for (int i = 0; i < 21; i++)
		cout << "■";
	cout << endl;

	cout << "■                                      ■" << endl;

	for (int i = 1; i < 5; i++)
		cout << endl;

	cout << "      因為沒東西吃，" << endl << "       上古龍與附近居民開始有了摩擦，" << endl;

	for (int i = 0; i < 3; i++)
		cout << endl;

	cout << "       爭鬥食物越演越烈" << endl << "        最後衍伸成互相殘殺..." << endl;

	for (int i = 0; i < 5; i++)
		cout << endl;

	cout << "■                             Enter>>>>■" << endl;

	for (int i = 0; i < 21; i++)
		cout << "■";
	cout << endl;

	_getch();
	system("Cls");
}