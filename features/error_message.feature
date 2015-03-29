          Feature: When a shopper on the site adds a coupon code to the store
              As a shopper
              I should see better more informative error messages returned about my coupon code

              Scenario: I have a coupon code that is valid but has not yet become activated
              Given I have a valid coupon code "SOMENEWPROMOCODE"
              When I try to redeem the coupon code
              Then I should see the error message "Your coupon is not valid yet. It will be active on"

              Scenario: I have a coupon code that is no longer valid based on the current date
              Given I have a valid coupon code "VOUCHERCODEDATE"
              When I try to redeem the coupon code
              Then I should see the error message "Your coupon is no longer valid. It expired on"

              Scenario: I have a coupon code that has reached it's global usage limit
              Given I have a valid coupon code "VOUCHERCODE"
              When I try to redeem the coupon code
              Then I should see the error message "Your coupon was already used. It might only be used"

              Scenario: I have a coupon code that has reached it's individual usage limit for a specific customer group
              Given I am logged in as a “Return visitor” customer 
              And I have a valid coupon code "VOUCHERCODE"
              When I try to redeem the coupon code
              Then I should see the error message "You have already used your coupon. It might only be used"
              
