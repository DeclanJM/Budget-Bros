package Model;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Scanner;

public class Calculations {
    private double total;
    private HashMap<String,Double> categories = new HashMap<String,Double>();

    public Calculations() {
        this.total = 0;
    }

    public Calculations(double total) {
        this.total = total;
    }


    public double getTotal() {
        return this.total;
    }


    public void setTotal(double newTotal) {
        this.total = newTotal;
    }


    public ArrayList<ArrayList<String>> readInFile(String fileName){ //takes file and returns 2d arraylist of expenditures
        ArrayList<ArrayList<String>> expenditures = new ArrayList<ArrayList<String>>();
        try {
        File myObj = new File(fileName);
        Scanner sc = new Scanner(myObj);
        while (sc.hasNextLine()) {
            ArrayList<String> arr = new ArrayList<String>(Arrays.asList(sc.nextLine().split(" ")));
            expenditures.add(arr);
        }
        sc.close();
        } catch (FileNotFoundException e) {
        System.out.println("File not found");
        System.exit(-1);
        }
        return expenditures;
    }

    public void mapExpenditures(ArrayList<String> transaction) {
        if (!categories.containsKey(transaction.get(1).toUpperCase())){
            categories.put(transaction.get(1).toUpperCase(), Double.parseDouble(transaction.get(2)));
        }
        else{
            categories.replace(transaction.get(1).toUpperCase(), categories.get(transaction.get(1).toUpperCase()) + Double.parseDouble(transaction.get(2)));
        }
        // takes arraylist of format {name, category, cost, date} and maps category and total
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


    public static void main(String[] args) {
        //Test different Calculations(double total) methods, eventually will move this to the Test class

    }
}
