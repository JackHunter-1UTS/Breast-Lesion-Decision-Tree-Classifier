import pandas as pd

class Formatter:
  def __init__(self, replacements):
    self.replacements = replacements

  def format(self, age, data):
    if type(age) != int:
      age = -1
    for i in range(len(data)):
      if data[i] in self.replacements[i]:
        data[i] = self.replacements[i].index(data[i])
      else:
        self.replacements[i].append(data[i])
        data[i] = self.replacements[i].index(data[i])
    print(data)
    data = iter(data)
    map = {
        "Age":[age], "Tissue_composition":[next(data)], "Signs":[next(data)], "Symptoms":[next(data)], "Shape":[next(data)], "Margin":[next(data)], "Echogenicity":[next(data)], "Posterior_features":[next(data)], "Halo":[next(data)], "Calcifications":[next(data)], "Skin_thickening":[next(data)]
    }
    return pd.DataFrame(map)