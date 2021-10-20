const { transform } = require('windicss/helpers')

module.exports = {
  plugins: [transform('daisyui'), require('@windicss/plugin-icons')],
}
