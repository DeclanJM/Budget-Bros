package Model;

import java.util.ArrayList;

public class Calculations {
private double total;

public Calculations(double total){
    this.total = total;
    
}
public static void main(String[] args) {
      
}
/*
* 
* 
*
* Calc total cost 
*/
public double CalcTotal(ArrayList<Double> list){

for (Double element : list){
    total += element;
}
return total;
}
public double CalcPercentage(ArrayList<Double> list){

    return 0;
}
}
