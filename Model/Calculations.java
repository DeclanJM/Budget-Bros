package Model;
import java.util.ArrayList;
public class Calculations {
private double total;

public Calculations(double total){
    this.total = total;
    
}
public static void main(String[] args) {
      
}
public ArrayList<Double> ReadInFile(ArrayList<String> categories) {
    return null;
    // returns array of totals for each category keeping  track of order of categories
    /* call calc total for each category
     * 
     * 
     * 
     * 
     * 
     * 
     */

}
public double CalcTotal(ArrayList<Double> categoryTotals){
// calculate overall total for categories combined
for (double element : categoryTotals){
    total += element;
}
return total;
}
public double CalcPercentage(ArrayList<Double> list){
    return 0;
}

//
}
