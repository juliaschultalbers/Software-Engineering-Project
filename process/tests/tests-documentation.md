# Test suite 1: Initial Unit Tests
## Tool 
Name and version: DeepSeek-R1 (2025-06-22)

## Workflow 
Input queries:
1. "Generate unit tests for meal voting system functions using unittest framework"
2. "Create test cases for core functions: add_meal, vote_for_meal, update_votes, and submit_vacation_request_length"
3. "Include both valid and invalid cases with proper mocking"

Outputs:
- Created `CodeBase_Tests.py` with:
  - Test cases for input validation (empty names, negative votes)
  - Mocking of database operations
  - Parameterized tests for different scenarios
  - Assertions for expected error messages and success responses

## Discussion 
- The resulting tests were helpful for initial validation but had limited coverage of edge cases
- The test suite is suitable for basic functionality testing but needs expansion for production use
- Advice: Start with core business logic first, clearly define expected behaviors before writing tests
- Lessons: Mocking is essential for database operations, parameterized tests save time
- Will definitely use AI for initial test scaffolding in future projects

# Test suite 2: Domain-Based Test Expansion
## Tool 
Name and version: DeepSeek-R1 (2025-06-22)

## Workflow 
Input queries:
1. "Expand test coverage using this domain-based test matrix"
2. "Generate tests for all functions in the spreadsheet with edge cases"
3. "Add tests for: update_meal, remove_meal, set_to_zero, approve_vacation, alert_on_staffing_gap, and report_sickness"

Outputs:
- Enhanced test suite covering all 15 functions from specification
- Added tests for:
  - Boundary cases (0 votes, 1/30 vacation days)
  - Type validation (boolean checks)
  - Error conditions (invalid IDs, negative values)
  - State reset functionality
- Parameterized tests covering all categories: Valid, Invalid, Edge Case

## Discussion 
- The expanded tests significantly improved artifact quality by revealing missing validation checks
- The complete test suite is now suitable for production testing with full domain coverage
- Advice: Use spreadsheet specifications as test blueprints, prioritize edge cases in critical systems
- Lessons: Domain-based testing ensures requirement coverage, explicit thresholds prevent business logic errors
- Will continue using AI for test generation, especially for data-driven testing scenarios