#include "Fight_Slime.h" //j ���� //k  �ϥ��Ĥ�
#include "Clls.h"
#include "Home.h"
#include <iomanip>

Fight_Slime::Fight_Slime() 
{
	slime_hp = 10;
	slime_atk = 10;
	fight_start();
}

void Fight_Slime::fight_start() 
{
	while (1)
	{
		Clls();
		print_scene(1);

		char action;
		action = _getch();
		if (action == 'j')
		{
			if (fight_give_atk() == 1) {//1 normal ,2 give_atk,3,posion,4,get_atk,5 die ,8die message,6,slimedie ,7 win
				lvup();

				Sleep(400);
				print_scene(6);
				Sleep(400);
				print_scene(7);

				_getch();
				system("cls");

				win_lose = 1;				//Ĺ�F���X�h
				break;
			}//slime die

			if (fight_get_atk() == 1) 
			{
				Sleep(400);
				print_scene(8);
				print_scene(5);
				win_lose = 2;
				Sleep(300);
				break;
			}//me die
		}
		else if (action == 'k') 
			usepoison();
	}
}

int Fight_Slime::fight_give_atk()
{
	slime_hp = slime_hp - atk;

	Sleep(200);
	print_scene(2);
	print_scene(1);

	if (slime_hp <= 0)
		return 1;
	else
		return 2;
}

int  Fight_Slime::fight_get_atk()
{
	hp = hp - slime_atk;

	Sleep(400);
	print_scene(4);

	if (hp <= 0) 
		return 1;
	else
		return 2;
}

void Fight_Slime::usepoison() 
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

void Fight_Slime::lvup() 
{
	lv = 999;
	hp = hp + 90;
	atk = atk + 15;
	posion_count++;
}

void Fight_Slime::print_scene(int chose)//1 normal ,2 give_atk,3,posion,4,get_atk,5 die ,6,slimedie ,7 win,8 diemessage
{
	Clls();

	for (int i = 0; i < 27; i++)
	{
		if (i >= 22 && i <= 26)
		{
			if (chose == 1)
			{
				if (hp >= 100)
					cout << "��HP�G" << setw(11) << setfill(' ') << hp << "ATK�G" << atk << "              ��\n��                                      ��\n";
				else
					cout << "��HP�G" << hp << "            " << "ATK�G" << atk << "              ��\n��                                      ��\n";

				cout << "��LV�G" << lv << "             " << "EQM�G" << eqm << posion_count << "        ��\n��                                      ��\n";

				i = 26;
			}
			else if (chose == 2)
			{
				cout << "��                                      ��\n";
				cout << "���i�̵o�ʧ���                          ��\n";
				cout << "��                                      ��\n";
				cout << "��                                      ��\n";
				i = 26;
			}
			else if (chose == 3)
			{
				if (posion_count == 0)
				{
					cout << "��                                      ��\n";
					cout << "���S���Ĥ��A�ϥΥ���                    ��\n";
					cout << "��                                      ��\n";
					cout << "��                                      ��\n";
				}
				else
				{
					cout << "��                                      ��\n";
					cout << "���ϥ��]�k�Ĥ� �i�̫�_���O             ��\n";
					cout << "��                                      ��\n";
					cout << "��                                      ��\n";
				}
				i = 26;
			}
			else if (chose == 4)
			{
				cout << "��                                      ��\n";
				cout << "���v�ܩi�o�ʧ���  �i��HP-10             ��\n";
				cout << "��                                      ��\n";
				cout << "��                                      ��\n";
				i = 26;
			}
			else if (chose == 8)
			{
				cout << "��                                      ��\n";
				cout << "���v�ܩi�o�ʧ���  �i�̦��`              ��\n";
				cout << "��                                      ��\n";
				cout << "��                                      ��\n";
				i = 26;
			}
			else if (chose == 6)
			{
				cout << "��                                      ��\n";
				cout << "���v�ܩi���`                            ��\n";
				cout << "��                                      ��\n";
				cout << "��                                      ��\n";
				i = 26;
			}
			else if (chose == 7)
			{
				cout << "�� �����Ĥ�x1      LV UP!!              ��\n";
				cout << "�� HP+80           ATK+15               ��\n";
				cout << "�� LV+998                               ��\n";
				cout << "��                                      ��\n";
				i = 26;
			}
		}

		for (int j = 0; j < 21; j++)
		{
			//1
			if (chose == 1 || chose == 3)
			{
				if (fight[i][j] == 1)
					cout << "��";
				else
					cout << "  ";
			}
			//2
			else if (chose == 2)
			{
				if (fight_person_atk[i][j] == 1)
					cout << "��";
				else
					cout << "  ";
			}
			//4
			else if (chose == 4 || chose == 8)
			{
				if (fight_enemy_atk[i][j] == 1)
					cout << "��";
				else
					cout << "  ";
			}										
			//5
			else if (chose == 5)
			{
				if (die_sence[i][j] == 1)
					cout << "��";
				else
					cout << "  ";
			}
			//6
			else if (chose == 6)
			{
				if (slime_killed[i][j] == 1)
					cout << "��";
				else
					cout << "  ";
			}
			//7
			else if (chose == 7)
			{
				if (slime_killed_win[i][j] == 1)
					cout << "��";
				else
					cout << "  ";
			}
		}
		cout << endl;
	}
	Sleep(500);
}



