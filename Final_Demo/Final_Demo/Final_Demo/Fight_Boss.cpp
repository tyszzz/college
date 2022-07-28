#include "Fight_Boss.h" //j 攻擊 //k  使用藥水
#include "Cls.h"
#include "Home.h"

Fight_Boss::Fight_Boss() 
{
	boss_hp = 100;
	boss_atk = 40;
	fight_start();
}

void Fight_Boss::fight_start() 
{
	while (1) 
	{
		cls();
		print_scene(1);

		char action;
		action = _getch();
		if (action == 'j')
		{
			if (fight_give_atk() == 1)//1 normal ,2 give_atk,3,posion,4,get_atk,5 die ,8die message,6,bossdie ,7 win
			{
				Sleep(400);
				print_scene(6);
				Sleep(400);
				print_scene(7);

				_getch();
				cls();
				end_story();					//贏了跳出去
				break;
			}//boss die
			if (fight_get_atk() == 1)
			{
				Sleep(400);
				print_scene(8);
				print_scene(5);
				_getch();
				Sleep(300);
				break;
			}//me die
		}
		else if (action == 'k') 
			usepoison();
	}
}

int Fight_Boss::fight_give_atk() 
{
	boss_hp = boss_hp - atk;
	Sleep(200);
	print_scene(2);
	print_scene(1);

	if (boss_hp <= 0)
		return 1;
	else 
		return 2;
}

int  Fight_Boss::fight_get_atk() 
{
	hp = hp - boss_atk;
	Sleep(400);
	print_scene(4);

	if (hp <= 0)
		return 1;
	else
		return 2;
}

void Fight_Boss::usepoison()
{
	if (posion_count != 0) 
	{
		print_scene(3);
		hp = hp + 100;
		posion_count--;
	}
	else 
		print_scene(3);
}

void Fight_Boss::print_scene(int chose) //1 normal ,2 give_atk,3,posion,4,get_atk,5 die ,6,bossdie ,7 win,8 diemessage
{
	cls();

	for (int i = 0; i < 27; i++) 
	{
		if (i >= 22 && i <= 26)
		{
			if (chose == 1) 
			{
				if (hp >= 100)
					cout << "■HP：" << hp << "             ";
				else
					cout << "■HP：" << hp << "              ";

				if (atk >= 10)
					cout<<"ATK：" << atk << "           ■\n■                                      ■\n";
				else 
					cout << "ATK：" << atk << "            ■\n■                                      ■\n";

				if (lv >= 10) 
				cout << "■LV：" << lv << "             " << "EQM：" << eqm << posion_count << "      ■\n■                                      ■\n";
				else 
				cout << "■LV：" << lv << "               " << "EQM：" << eqm << posion_count << "      ■\n■                                      ■\n";

				i = 26;
			}
			else if (chose == 2)
			{
				cout << "■                                      ■\n";
				cout << "■勇者發動攻擊                          ■\n";
				cout << "■                                      ■\n";
				cout << "■                                      ■\n";
				i = 26;
			}
			else if (chose == 3) 
			{
				if (posion_count == 0) 
				{
					cout << "■                                      ■\n";
					cout << "■沒有藥水，使用失敗                    ■\n";
					cout << "■                                      ■\n";
					cout << "■                                      ■\n";
				}
				else
				{
					cout << "■                                      ■\n";
					cout << "■使用魔法藥水 勇者恢復活力             ■\n";
					cout << "■                                      ■\n";
					cout << "■                                      ■\n";
				}
				i = 26;
			}
			else if (chose == 4) 
			{
				cout << "■                                      ■\n";
				cout << "■上古龍發動攻擊  勇者HP-40             ■\n";
				cout << "■                                      ■\n";
				cout << "■                                      ■\n";
				i = 26;
			}
			else if (chose == 8)
			{
				cout << "■                                      ■\n";
				cout << "■上古龍發動攻擊  勇者死亡              ■\n";
				cout << "■                                      ■\n";
				cout << "■                                      ■\n";
				i = 26;
			}
			else if (chose == 6)
			{
				cout << "■                                      ■\n";
				cout << "■上古龍死亡                            ■\n";
				cout << "■                                      ■\n";
				cout << "■                                      ■\n";
				i = 26;
			}
		}

		for (int j = 0; j < 21; j++)
		{
			//1
			if (chose == 1 || chose == 3)
			{			
				if (fight[i][j] == 1)
					cout << "■";
				else
					cout << "  ";
			}
			//2
			else if (chose == 2) 
			{
				if (fight_person_atk[i][j] == 1) 
					cout << "■";
				else
					cout << "  ";
			}
			//4
			else if (chose == 4 || chose == 8)
			{
				if (fight_enemy_atk[i][j] == 1)
					cout << "■";
				else
					cout << "  ";
			}
			//5
			else if (chose == 5) 
			{
				if (die_sence[i][j] == 1) 
					cout << "■";
				else
					cout << "  ";
			}
			//6
			else if (chose == 6) 
			{
				if (boss_killed[i][j] == 1)
					cout << "■";
				else
					cout << "  ";
			}
			else if (chose == 7) 
			{
				if (boss_killed_win[i][j] == 1)
					cout << "■";
				else
					cout << "  ";
			}
		}
		cout << endl;
	}
	Sleep(500);
}

void Fight_Boss::end_story()
{
	system("Cls");

	for (int i = 0; i < 21; i++)
		cout << "■";
	cout << endl;

	cout << "■                                      ■" << endl;

	cout << "\n\n\n\n"<<endl;

	cout << "          經過一場浴血的奮戰，" << "\n" << "           上古龍終於不敵被殺了" << endl;

	cout << "\n\n"<<endl;

	cout << "           人們重新回到原本的生活，" << "\n" << "            一切好似甚麼也沒發生，" << endl;

	cout << "\n\n\n\n"<<endl;

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

	cout << "\n\n\n\n" << endl;

	cout << "          但是" << "\n" << "           在一旁的龍谷" << endl;

	cout << "\n\n" << endl;

	cout << "           還能見到" << "\n" << "            山壁上的斑斑血跡..." << endl;

	cout << "\n\n\n\n" << endl;

	cout << "■                             Enter>>>>■" << endl;


	for (int i = 0; i < 21; i++)
	{
		cout << "■";
	}
	cout << endl;

	_getch();
	system("Cls");
}
