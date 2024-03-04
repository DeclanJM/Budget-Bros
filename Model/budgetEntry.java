package Model;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class budgetEntry {
    // from controller
    public static boolean writeToFile(String description, String category, String amount, String username) {
        try (BufferedWriter write = new BufferedWriter(new FileWriter(username + "-budget.txt", true))) {
            SimpleDateFormat format = new SimpleDateFormat("MM/dd/yyyy");
            String date = format.format(new Date());
            write.append("\n" + description + ", " + category + ", " + amount + ", " + date); 
            write.close();
            return true;
        } catch (IOException e) {
            System.err.printf("Error: %s\n\n", e);
            return false;
        }
    }
    // read input from View
    // write to users specified file
}