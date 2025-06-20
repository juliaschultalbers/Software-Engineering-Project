# test_meal_voting_system.py
import unittest
from unittest.mock import patch, mock_open
import meal_voting_system as mvs
import json

class TestMealVotingSystem(unittest.TestCase):

    @patch("meal_voting_system.load_db")
    @patch("meal_voting_system.save_db")
    def test_add_meal_valid(self, mock_save, mock_load):
        mock_load.return_value = []
        response = mvs.add_meal("Pizza")
        self.assertEqual(response, "Meal added successfully")

    @patch("meal_voting_system.load_db")
    def test_add_meal_empty(self, mock_load):
        response = mvs.add_meal("")
        self.assertEqual(response, "Error: Empty name")

    @patch("meal_voting_system.load_db")
    def test_vote_invalid_meal(self, mock_load):
        mock_load.return_value = []
        response = mvs.vote_for_meal(1, 101)
        self.assertEqual(response, "Error: Meal does not exist")

    @patch("meal_voting_system.load_db")
    @patch("meal_voting_system.save_db")
    def test_update_votes_negative(self, mock_save, mock_load):
        response = mvs.update_votes(1, -5)
        self.assertEqual(response, "Error: Negative votes")

    @patch("meal_voting_system.load_db")
    @patch("meal_voting_system.save_db")
    def test_submit_vacation_request_valid(self, mock_save, mock_load):
        mock_load.return_value = []
        response = mvs.submit_vacation_request_length(101, 5)
        self.assertEqual(response, "Request submitted")

    @patch("meal_voting_system.load_db")
    def test_submit_vacation_request_invalid(self, mock_load):
        response = mvs.submit_vacation_request_length(101, 0)
        self.assertEqual(response, "Error: Minimum duration not met")

if __name__ == '__main__':
    unittest.main()
