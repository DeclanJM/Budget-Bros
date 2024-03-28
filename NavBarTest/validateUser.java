import java.util.ArrayList;
import java.io.*;

public class validateUser {

    public static ArrayList<User> csvMachine(String filename, String delimiter, boolean firstLine) {
        CsvReader csvReader = new CsvReader(filename, delimiter);
        try {
            ArrayList<User> userList = csvReader.readUsersFromCsv(firstLine);
            return userList;

        } catch (IOException e) {
            System.err.println(e);
            return null;
        }
    }

    public static boolean validNewUser(User newGuy, ArrayList<User> currentUserList) {
        boolean seenName = false;
        boolean seenEmail = false;

        for(int i = 0; i < currentUserList.size(); i++) {
            if(currentUserList.get(i).getName().equals(newGuy.getName())) seenName = true;
            if(currentUserList.get(i).getEmail().equals(newGuy.getEmail())) seenEmail = true; 
        }
        if(seenName || seenEmail) return false;
        return true;
    }

    public static void main(String[] args) {
        ArrayList<User> newUserList = csvMachine("NewUser.csv", ",", false);
        ArrayList<User> currentUserList = csvMachine("currentUserList.csv", ",", true);

        User newGuy = newUserList.get(0);

        boolean heIsValid = validNewUser(newGuy, currentUserList);

        if(heIsValid) {
            //Add him to current users
            //currentUserList.add(newGuy);
            CsvWriter.writeUserToCsv("currentUserList.csv", newGuy);
        }
        else {
            //Do something else
        }

    }
}
