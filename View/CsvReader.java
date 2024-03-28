import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

public class CsvReader {
    private String filePath;
    private String delimiter;

    public CsvReader(String filePath, String delimiter) {
        this.filePath = filePath;
        this.delimiter = delimiter;
    }

    public ArrayList<User> readUsersFromCsv(boolean firstLine) throws FileNotFoundException, IOException{
        ArrayList<User> userList = new ArrayList<>();

        try (BufferedReader br = new BufferedReader(new FileReader(filePath))) {
            String line;

            while ((line = br.readLine()) != null) {
                // Skip the first line if it contains headers
                if (firstLine) {
                    firstLine = false;
                    continue;
                }

                String[] values = line.split(delimiter);

                User user = new User();
                if (values.length <= 5) {
                    user.setName(values[0]);
                    user.setEmail(values[1]);
                    user.setPassword(values[2]);
                }
                userList.add(user);
            }
            return userList;
        }  
    }
}
