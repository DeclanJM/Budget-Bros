import java.io.FileWriter;
import java.io.BufferedWriter;
import java.io.IOException;

public class CsvWriter {
    public static void writeUserToCsv(String filePath, User user) { 
        try { 
            BufferedWriter writer = new BufferedWriter(new FileWriter(filePath, true));
            writer.append('\n');
            writer.append(user.getName());
            writer.append(',');
            writer.append(user.getEmail());
            writer.append(',');
            writer.append(user.getPassword());
    
            writer.close();

        } 
        catch (IOException e) { 
            e.printStackTrace(); 
        } 
    }
}
