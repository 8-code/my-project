#include<iostream>
#include<vector>
#include<string>
using namespace std;

int n=9;

void print1(){
 vector<vector<char>>c(3,vector<char>(3,'.'));
 vector<vector<int>>b{{0,1,2},{3,4,5},{6,7,8}};
 for(int i=0;i<3;i++){
  cout<<"\t\t\t\t\t\t\t\t\t";
   for(int j=0;j<3;j++){cout<<c[i][j]<<"\t";}
   cout<<"    ==   ";
   for(int j=0;j<3;j++){cout<<b[i][j]<<"\t";}
   cout<<endl<<endl;
 }
 return;
}
void print(vector<vector<char>>&a){
for(int i=0;i<3;i++){
  cout<<"\n\t\t\t\t\t\t\t\t\t";
  for(int j=0;j<3;j++){
    cout<<" "<<a[i][j]<<"\t\t";
  }
   cout<<endl;
 } 
 return;
}

int check(vector<vector<char>>&a,int i,int j,char p){
int c=1;
  for(int k=0;k<3;k++){
    if(a[k][j]!=p){
       c=0;
       break;}
  }
  if(c==1){return 1;}

  for(int k=0;k<3;k++){
    if(a[i][k]!=p){
       c=1;
       break;}
  }
  if(c==0){ return 1;}

if(i==j || i+j==2){
for(int k=0,l=0;k<3 && l<3;k++,l++){
      if(a[k][l]!=p){
          c=0;
       break; }
  }
  if(c==1){return 1;}

  for(int k=2,l=0;k>=0 && l<3;k--,l++){
      if(a[k][l]!=p){
          c=1;
          break;}
  }
  if(c==0){return 1;}
}
  
return 0;
}

int turn(vector<vector<char>>&a,string s,char p){
  cout<<"\n\n\n\t\t"<<s<<" Choose Position: ";
  string c;
  cin>>c;
  int i=c[0]-'0';

  if(!(i < 9 && i >= 0) || c.length() > 1 || a[i/3][i%3] != '.'){
    cout<<"\n\n\t\twrong input\n";
    print1();
    cout<<"do you want to continue try again press 1 otherwise press 0: ";
    int terminate;
    cin>>terminate;
    if(!(terminate == 1)){ return 3; }
    int an = turn(a,s,p);
    return an;
  }

  a[i/3][i%3]=p;
  print(a);
  n--;
  int ans=check(a,i/3,i%3,p);
  return ans;
}

int cturn(vector<vector<char>>&a,char p){
 int crand = (rand() % 9);
 while(a[crand/3][crand%3] !='.'){
  crand = (rand() % 9);
  cout<<crand<<" ";
 }
 a[crand/3][crand%3]=p;
 cout<<"\n\t\tComputer Turn: ";
 print(a);
 return check(a,crand/3,crand%3,p);
}

int frnd(vector<vector<char>>&a,string s1,string s2,char p1,char p2){

  int input=turn(a,s1,p1);
  if(input==1){return 1;}
  else if(input==3){return 3;}
  else if(n<=0){return 2;}

  input=turn(a,s2,p2);
  if(input==1){return 0; }
  else if(input==3){return 3;}

  return frnd(a,s1,s2,p1,p2);
}

void frnd1(vector<vector<char>>&a){
cout<<"\tEnter Your Name Player1 :  ";
    string player1,player2;
    cin>>player1;

    cout<<endl<<"\tEnter Your Name Player2 :  ";
    cin>>player2;

    char p1,p2;

    cout<<"\n\n"<<player1<<"   Choose 'X' or 'O': ";
    cin>>p1;

    cout<<"\n\n\n";

    if(p1=='O'){p2='X';}
    else{p2='O';}

    print1();

    int ans=frnd(a,player1,player2,p1,p2);

    if(ans==1){
      cout<<"Congratulations...\t\t";
      cout<<player1<<"Won a Match"<<"\n";
      cout<<player2<<"\nbetter luck next time"<<"\n\n";
    }
    else if(ans==0){
      cout<<player2<<" Won a Match";
    }
    else if(ans==2){
      cout<<"It is tie";
    }
    return;
}

int comp1(vector<vector<char>>&a,string s,char p1,char p2){
  int input=turn(a,s,p1);
  if(input==1){return 1;}
  else if(input==3){return 3;}
  else if(n<=0){return 2;}
  
  input = cturn(a,p2);
  if(input){return 0;}

  return comp1(a,s,p1,p2);
}

void comp(vector<vector<char>>&a){
  cout<<"\t\tEnter Your Name Player1 :  ";
    string player1;
    cin>>player1;

    char p1,p2;

    cout<<"\n\n\t\t"<<player1<<" Choose 'X' or 'O': ";
    cin>>p1;

    cout<<"\n\n\n";

    if(p1=='O'){p2='X';}
    else{p2='O';}
    int ans=comp1(a,player1,p1,p2);
    if(ans==1){
      cout<<"\n\t\t\tCongratulations...\t";
      cout<<player1<<" Won a Match"<<"\n";
    }
    else if(ans==0){
      cout<<"\t\t\tComputer Won a Match";
    }
    else if(ans==2){
      cout<<"It is Tie";
    }
  return;
}
int main(){

    vector<vector<char>>a(3,vector<char>(3,'.'));
    print1();
    cout<<"\n\t\tplay with Computer press 1: \n";
    cout<<"\t\tplay with friends press 2:\t";
    string d;
    cin>>d;
    
    if(d[0] != '1' && d[0] != '2' || d.length()>1){
      cout<<"wrong input plz restart the game\n";}
    else if(d[0] == '1'){comp(a);}
    else{frnd1(a);}

    cout<<"Finish";
    return 0;
}