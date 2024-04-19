package Test;

import org.junit.jupiter.api.Test;

import Calculations;

import org.junit.jupiter.api.BeforeEach;
import static org.junit.jupiter.api.Assertions.assertEquals;


public class calculationsTest {
    //Tests go in here, make sure to download JUnit for testing and enable it

    private Calculations calc;
    @BeforeEach
    public void createCalculations() {
        calc = new Calculations();
    }


    @Test
    void testGetTotal() {
        assertEquals(0, calc.getTotal());

        calc = new Calculations(22);

        assertEquals(22, calc.getTotal());
    }


    @Test
    void testSetTotal() {
        calc.setTotal(45);

        assertEquals(45, calc.getTotal());
    }


    @Test
    void testTotalPercentage() {
        // Set up test data
        Calculations calculations = new Calculations();
        calculations.categories.put("Food", 50.0);
        calculations.categories.put("Transportation", 30.0);
        calculations.categories.put("Entertainment", 20.0);
    
        // Call the method to test
        double totalPercentage = calculations.CalcPercentage();
    
        // Assert the expected result (100%)
        assertEquals(100.0, totalPercentage, 0.01); // Allow a small margin of error due to floating-point calculations
    }
}
