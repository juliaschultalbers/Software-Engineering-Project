#	Code Base - neccessary function	in Python

# meal_voting_system.py
import json
from datetime import datetime

# Load data from JSON files
def load_db(path):
    with open(path, 'r') as file:
        return json.load(file)

def save_db(data, path):
    with open(path, 'w') as file:
        json.dump(data, file, indent=2)

# Core functions - Favorite_food_system
def add_meal(name):
    if not name:
        return "Error: Empty name"
    db = load_db('db_meals.json')
    db.append({"id": len(db)+1, "name": name, "votes": 0})
    save_db(db, 'db_meals.json')
    return "Meal added successfully"

def update_meal(meal_id, new_name):
    db = load_db('db_meals.json')
    for meal in db:
        if meal['id'] == meal_id:
            meal['name'] = new_name
            save_db(db, 'db_meals.json')
            return "Meal updated"
    return "Error: Meal not found"

def remove_meal(meal_id):
    db = load_db('db_meals.json')
    updated_db = [meal for meal in db if meal['id'] != meal_id]
    if len(db) == len(updated_db):
        return "Error: Meal not found"
    save_db(updated_db, 'db_meals.json')
    return "Meal removed"

def vote_for_meal(meal_id, user_id):
    meals = load_db('db_meals.json')
    if not any(m['id'] == meal_id for m in meals):
        return "Error: Meal does not exist"
    voting = load_db('db_votings.json')
    voting.append({"meal_id": meal_id, "user_id": user_id, "timestamp": datetime.now().isoformat()})
    save_db(voting, 'db_votings.json')
    for m in meals:
        if m['id'] == meal_id:
            m['votes'] += 1
    save_db(meals, 'db_meals.json')
    return "Vote recorded"

def update_votes(meal_id, votes):
    if votes < 0:
        return "Error: Negative votes"
    db = load_db('db_meals.json')
    for meal in db:
        if meal['id'] == meal_id:
            meal['votes'] = votes
            save_db(db, 'db_meals.json')
            return "Votes updated"
    return "Error: Meal not found"

def set_to_zero():
    meals = load_db('db_meals.json')
    for m in meals:
        m['votes'] = 0
    save_db(meals, 'db_meals.json')
    save_db([], 'db_votings.json')
    return "All votes reset"

# Scheduling_system functions
def submit_vacation_request_length(user_id, length):
    if length < 1:
        return "Error: Minimum duration not met"
    if length > 30:
        return "Error: Maximum duration exceeded"
    requests = load_db('db_requests.json')
    requests.append({"user_id": user_id, "length": length, "status": "pending"})
    save_db(requests, 'db_requests.json')
    return "Request submitted"

def approve_vacation(request_id, approve):
    if not isinstance(approve, bool):
        return "Error: Approval must be boolean"
    requests = load_db('db_requests.json')
    for req in requests:
        if req.get("id") == request_id:
            req['status'] = "approved" if approve else "rejected"
            save_db(requests, 'db_requests.json')
            return f"Vacation {'approved' if approve else 'rejected'}"
    return "Error: Request not found"

def view_shift_plan():
    return load_db('db_shifts.json')

def view_staffing_overview():
    return load_db('db_groups.json')

def alert_on_staffing_gap(threshold=4):
    groups = load_db('db_groups.json')
    alerts = [g for g in groups if len(g.get('employees', [])) <= threshold]
    return alerts if alerts else "No staffing gap detected"

def report_sickness(user_id):
    if user_id < 0:
        return "Error: Invalid user ID"
    sickness = load_db('db_sickness.json')
    sickness.append({"user_id": user_id, "timestamp": datetime.now().isoformat()})
    save_db(sickness, 'db_sickness.json')
    return "Sickness reported"

# Group and user validation
def check_groups_valid():
    groups = load_db('db_groups.json')
    for g in groups:
        if 'employee' not in g or not g['employee']:
            return False
    return True
