namespace java com.blogspot.symfonyworld.wealthylaughingduck.thrift.generated
namespace php SymfonyWorld.WealthyLaughingDuck

typedef i32 int

service MainService {
  int add(1:int n1, 2:int n2),
  int sub(1:int n1, 2:int n2)
}

