Conditions:
===
Options for `cond.txt` (Changed automatically)
---
- 0
  - Poor
  - No borrowing
- 1
  - Rich
  - No borrowing
- 2
  - Poor
  - Rich income shock after trials
- 3
  - Rich
  - Poor income shock after trials

Options for `canborrow.txt` (Supersedes `cond.txt`):
---
- 0: Borrowing not allowed. Will disable conditions 3 and 4 for `cond.txt`
- 1: Borrowing allowed (still depends on the `cond.txt`)

Shot Specs (`results.txt`):
===
CSV map:
---
- Subject Number (Relates to `demographics.txt`)
- Condition Parameter (Setting in `cond.txt`)
- Level Number
- Number of Berries used in the Level
- Number of Points scored in the Level
- Array (Separated by `#`) of Points scored with each Blueberry
- Array (Separated by `#`) of Time (in milliseconds) spent aiming each Blueberry
- Array (Separated by `#`) of Errors(?) (Seems to never be used)
- Insurance bought? 1 for bought, 0 for not bought
- Price
- Displayed probability
- Number of Blueberries (potentially) lost
- Expected value
- Reasonable (1 or 0)
- Does the drought happen? 1 for yes, 0 for no
